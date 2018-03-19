<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>{{ pageTitle }}</title>
</head>
<body>
	{@ for name in names @}
		{{ name[0] }}
	{@ endfor @}
</body>
</html>