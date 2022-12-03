#include<ESP8266WiFi.h>
#include<SPI.h>
#include<Wire.h>
#include<SoftwareSerial.h>
#include<ESP8266WebServer.h>
#include<ESP8266HTTPClient.h>
#include<Adafruit_GFX.h>
#include<Adafruit_Fingerprint.h>
SoftwareSerial myserial(D1, D2);
Adafruit_Fingerprint finr= Adafruit_Fingerprint(&myserial);
const char *ssid = "Dayanada sagar Boys";
const char *password ="123456789";
WiFiClient wifiClient;
//String post="";
String ln="http://192.168.101.77/biometricattendance/interface.php";
int FID=0;
void setup()
{
  Serial.begin(115200);
  cnnct();
}

void loop()
  {
    var();
    delay(10000);
    if(WiFi.status()!=WL_CONNECTED)
    {
      cnnct();
    }
  }
void var()
{
  HTTPClient http;
  String post = "api_key=MuoVcoDvRjHdWuQPMDvxqWkIxnoOGPFbwcoYCtCZ&check_register";
  //String post = "api_key=MuoVcoDvRjHdWuQPMDvxqWkIxnoOGPFbwcoYCtCZ&register_fingre&uid="+uid+"&fid="+fid;
  //String post = "api_key=MuoVcoDvRjHdWuQPMDvxqWkIxnoOGPFbwcoYCtCZ&check_remove";
  //String post = "api_key=MuoVcoDvRjHdWuQPMDvxqWkIxnoOGPFbwcoYCtCZ&remove_fingure&fid="+fid;
  //String post = "api_key=MuoVcoDvRjHdWuQPMDvxqWkIxnoOGPFbwcoYCtCZ&attendance&fid="+fid;

  http.begin(wifiClient, ln);
  http.addHeader("Content-Type", "application/x-www-form-urlencoded");  
  int htcde=http.POST(post);
  String Payload=http.getString();
  Serial.println(post);
  Serial.println(htcde);
  Serial.println(Payload);
  }
void cnnct()
{
  WiFi.mode(WIFI_OFF);
    delay(1000);
    WiFi.mode(WIFI_STA);
    Serial.print("Connecting to ");
    Serial.println(ssid);
    WiFi.begin(ssid, password);
 while (WiFi.status() != WL_CONNECTED) {
      delay(500);
      Serial.print(".");
    }
    Serial.println("");
    Serial.println("Connected");
      Serial.print("IP address: ");
    Serial.println(WiFi.localIP());
}
