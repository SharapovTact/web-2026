PROGRAM Hello(INPUT, OUTPUT);
USES
  GPC;
VAR
  QueryString, Name, Response: STRING;
  SeparatorPos: INTEGER;
BEGIN {localhost/test-cgi/lw6.cgi?name=Nikita&age=18}
  QueryString := GetEnv('QUERY_STRING');  
  IF ((Pos('name=', QueryString) = 1) AND (Length(QueryString) > 5) AND (QueryString[6] <> '&'))
  THEN
    BEGIN
      Name := Copy(QueryString, 6, Length(QueryString));
      SeparatorPos := Pos('&', Name);               
      IF SeparatorPos > 0
      THEN
        Name := Copy(Name, 1, SeparatorPos - 1);
      Response := 'Hello dear, ' + Name + '!'
    END
  ELSE
    Response := 'Hello ' + 'Anonymous!';

  WRITELN('Content-type: text/html');
  WRITELN;
  WRITELN(Response)
END.
