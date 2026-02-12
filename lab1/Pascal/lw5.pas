PROGRAM SarahRevere(INPUT, OUTPUT);
USES
  GPC;
VAR
  QueryString, Lanterns, Response: STRING;
  PosLanterns: INTEGER;
BEGIN
  Response := 'The British are coming from ';
  QueryString := GetEnv('QUERY_STRING');
  PosLanterns := Pos('lanterns=', QueryString);
  
  IF PosLanterns > 0 
  THEN
    BEGIN
      Delete(QueryString, 1, PosLanterns + 8);
      Lanterns := QueryString
  END;
  
  IF Lanterns = '1'
  THEN
    Response := Response + 'land!'
  ELSE
    IF Lanterns = '2'
    THEN
      Response := Response + 'sea!'
    ELSE
      Response := 'Sarah, what do you mean?';
  
  
  WRITELN('Content-type: text/html');
  WRITELN;
  WRITELN(Response)
END.
