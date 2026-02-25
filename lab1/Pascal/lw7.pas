PROGRAM WorkWithQueryString(INPUT, OUTPUT);
USES
  GPC;
FUNCTION GetQueryStringParameter(Key: STRING): STRING;
VAR
  QueryString, Parametr: STRING;
  PosKey: INTEGER;
BEGIN {GetQueryStringParameter}
  QueryString := '&' + GetEnv('QUERY_STRING') + '&';
  Key := '&' + Key;
  PosKey := Pos(Key, QueryString);
  
  IF PosKey > 0
  THEN
    BEGIN
      QueryString := Copy(QueryString, PosKey + 1, Length(QueryString));
      PosKey := Pos(Key, QueryString);
      IF Pos('&', QueryString) > PosKey
      THEN
        QueryString := Copy(QueryString, 1, Pos('&', QueryString) - 1);
      Parametr := Copy(QueryString, PosKey + Length(Key) + 2, Length(QueryString))
    END
  ELSE
    Parametr := 'None';
  
  GetQueryStringParameter := Parametr
END; {GetQueryStringParameter}

BEGIN {WorkWithQueryString}
  WRITELN('Content-Type: text/plain');
  WRITELN;
  WRITELN('First Name: ', GetQueryStringParameter('name'));
  WRITELN('Last Name: ', GetQueryStringParameter('last_name'));
  WRITELN('Age: ', GetQueryStringParameter('age'))
END. {WorkWithQueryString}

