PROGRAM Hello(INPUT, OUTPUT);
USES
  GPC;
VAR
  QueryString, Name, Response: STRING;
BEGIN
  QueryString := GetEnv('QUERY_STRING');
  IF Pos('name=', QueryString) = 1
  THEN
    BEGIN
      Name := Copy(QueryString, 6, Length(QueryString) - 5);
      Response := 'Hello dear, ' + Name + '!'
    END
  ELSE
    Response := 'Hello ' + 'Anonymous!';

  WRITELN('Content-type: text/html');
  WRITELN;
  WRITELN(Response)
END.
