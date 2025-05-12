int ledPin = LED_BUILTIN;
int flashbuttonPin = 4;
int buttonState = 1;




#include  <ESP8266WebServer.h>
#include <ESP8266WiFi.h>
char *ssid = "IoT"; //SSID labAP
char *password = "SPSvos123"; //heslo labAP
WiFiClient espClient; //definování klienta espClient
ESP8266WebServer server(80); //definování http serveru na portu 80
//funkce nastavení WiFi-------------------------------------------------------





void setup_wifi() {
WiFi.mode(WIFI_STA); //mód client
Serial.println(); //výpis přihlašovacích údajů
Serial.print("Connecting to ");
Serial.println(ssid);
Serial.print("password: ");
Serial.println(password);
// Wait for connection AND IP address from DHCP
Serial.println();
Serial.println("Waiting for connection and IP Address from DHCP");
WiFi.begin(ssid, password); //zahájení asociace
//opakuj dokud není připojeno
while (WiFi.status() != WL_CONNECTED) {
delay(500);
Serial.print(".");
}
Serial.println("");
Serial.print("WiFi connected, IP address: "); //výpis přidělené adresy
Serial.println(WiFi.localIP());
}
void setup() {
Serial.begin(74880);
setup_wifi();
server.on("/", handleRoot); // volá 'handleRoot' funkci když client požaduje URI "/"
server.onNotFound(handleNotFound); // když client požaduje neznámou URI (např. jinou než "/"), volá ´handleNotFound´
server.begin(); //zahájení naslouchání


pinMode(flashbuttonPin, INPUT_PULLUP);
pinMode(ledPin, OUTPUT);
server.on("/ledon", ledon); //stránka volající funkci ledon
server.on("/ledoff", ledoff); //stránka volající funkci ledoff
}
void ledon(){
digitalWrite(ledPin, LOW); //zapne LED
handleRoot(); //vrátí se na úvodní stránku
}
void ledoff(){
digitalWrite(ledPin, HIGH); //vypne LED
handleRoot(); //vrátí se na úvodní stránku
}
void handleRoot() {
char *html; //deklarace řetězce
// podle buttonState vypíše text Tlacitko ...
if (buttonState){
html = "<h1>Tlacitko neni zmacknute<h1> <a href='ledon'><button>ON</button></a> <a href='ledoff'><button>OFF</button></a>"; //podle stavu web tlačítka ON, OFF volá funkci ledon, ledoff
}
else {
html = "<h1>Tlacitko je zmacknute<h1> <a href='ledon'><button>ON</button></a> <a href='ledoff'><button>OFF</button></a>";
}
server.send(200, "text/html", html); //pošle text html na server
}
void handleNotFound(){
server.send(404, "text/plain", "404: Not found"); // vyšle HTTP status 404 (Not Found) pokud není handler pro URI v požadavku
}

void loop() {
buttonState = digitalRead(flashbuttonPin);

server.handleClient(); //monitoruje klienta a poskytne požadovanou stránku
delay(1000); //vyčká 1000ms
}
