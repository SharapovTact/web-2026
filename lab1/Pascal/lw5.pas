PROGRAM SarahRevere(INPUT, OUTPUT);
USES
  GPC;
VAR
  QueryString: STRING;
BEGIN
  WRITELN('Content-type: text/html');
  WRITELN;
  QueryString := GetEnv('QUERY_STRING');
  IF (QueryString = 'lanterns=1')
  THEN
    WRITELN('The British are coming from land!')
  ELSE
    IF (QueryString = 'lanterns=2')
    THEN
      WRITELN('The British are coming from sea!')
    ELSE
      WRITELN('Sarah, what do you mean?');
END.
