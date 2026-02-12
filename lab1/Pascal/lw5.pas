PROGRAM SarahRevere(INPUT, OUTPUT);
USES
  GPC;
BEGIN
  WRITELN('Content-type: text/html');
  WRITELN;
  IF (GetEnv('QUERY_STRING') = 'lanterns=1')
  THEN
    WRITELN('The British are coming from land!')
  ELSE
    IF (GetEnv('QUERY_STRING') = 'lanterns=2')
    THEN
      WRITELN('The British are coming from sea!')
    ELSE
      WRITELN('Sarah, what do you mean?');
END.
