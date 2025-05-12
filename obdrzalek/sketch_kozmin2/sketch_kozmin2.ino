#include <ESP8266WiFi.h>
char *ssid = "IoT"; //SSID labAP
char *password = "SPSvos123"; //heslo labAP
WiFiClient espClient; //definování klienta espClient
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
}
void loop(){
  
}
