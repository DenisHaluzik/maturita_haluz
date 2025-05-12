
#include <ESP8266WiFi.h>
char *ssid = "tonikslonik"; //XX - číslo pracoviště
char *password = "123456789"; //heslo PSK
void setup() {
WiFi.softAP(ssid, password); // spuštění AP
delay(100); // zpoždění po spuštění
Serial.begin(74880); //inicializace sériové linky
IPAddress myIP = WiFi.softAPIP(); //uložení IP do myIP
Serial.print("IP address: "); //výpis IP adresy
Serial.println(myIP);
}
void loop() {
  // put your main code here, to run repeatedly:

}
