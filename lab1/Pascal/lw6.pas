PROGRAM Hello(INPUT, OUTPUT);
USES
  GPC;
VAR
  QueryString, Name, Response: STRING;
BEGIN
  QueryString := GetEnv('QUERY_STRING');
  Response := 'Hello ';
  IF Pos('name=', QueryString) > 0
  THEN
    BEGIN
      QueryString := Copy(QueryString, Pos('name=', QueryString), Length(QueryString))
      Name := Copy(QueryString, 6, Length(QueryString) - 5);
      Response := Response + 'dear, ' + Name + '!'
    END
  ELSE
    Response := Response + 'Anonymous!';

  WRITELN('Content-type: text/html');
  WRITELN;
  WRITELN(Response)
END.
