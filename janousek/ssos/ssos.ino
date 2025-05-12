int s=150;
int o=500;
int wait=1000;
int redled=8;

void setup() {
  pinMode(redled, OUTPUT);

}

void loop() {
  digitalWrite(redled, HIGH);
  delay(s);
  digitalWrite(redled, LOW);
  delay(s);
  digitalWrite(redled, HIGH);
  delay(s);
  digitalWrite(redled, LOW);
  delay(s);
  digitalWrite(redled, HIGH);
  delay(s);
  digitalWrite(redled, LOW);
  delay(o);

    digitalWrite(redled, HIGH);
  delay(o);
  digitalWrite(redled, LOW);
  delay(o);
  digitalWrite(redled, HIGH);
  delay(o);
  digitalWrite(redled, LOW);
  delay(o);
  digitalWrite(redled, HIGH);
  delay(o);
  digitalWrite(redled, LOW);
  delay(o);

    digitalWrite(redled, HIGH);
  delay(s);
  digitalWrite(redled, LOW);
  delay(s);
  digitalWrite(redled, HIGH);
  delay(s);
  digitalWrite(redled, LOW);
  delay(s);
  digitalWrite(redled, HIGH);
  delay(s);
  digitalWrite(redled, LOW);
  delay(wait);
}
