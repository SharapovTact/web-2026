PROGRAM Hello(INPUT, OUTPUT);
USES
  GPC;
VAR
  QueryString, Name, Response: STRING;
  SeparatorPos: INTEGER;
BEGIN {localhost/test-cgi/lw6.cgi?name=Nikita&age=18}
  QueryString := GetEnv('QUERY_STRING');
  IF Pos('name=', QueryString) = 1
  THEN
    BEGIN
      Name := Copy(QueryString, 6, Length(QueryString) - 5);
      SeparatorPos := Pos('&', Name);               
      IF SeparatorPos > 0
      THEN
        Name := Copy(QueryString, 1, Length(QueryString) - SeparatorPos);
      Response := 'Hello dear, ' + Name + '!'
    END
  ELSE
    Response := 'Hello ' + 'Anonymous!';

  WRITELN('Content-type: text/html');
  WRITELN;
  WRITELN(Response)
END.
