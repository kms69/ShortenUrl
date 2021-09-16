Shortening url and decoding it accompanied by phpunit test and autload Static Variables:

$chars – Allowed characters for the short code. (Characters group is separated by |)

$codeLength – The length of the short code characters.

Functions:

urlToShortCode() – Validate URL and create short code. validateUrlFormat() – Validate the format of the URL. urlExistsInJS() – Verify the URL whether it exist in list.json if it exists throws an exception, else it will return FASLE. createShortCode() – Create short code for the long URL and insert the long URL & short code in the list.json. generateRandomString() – Generate random string (short code) with the specified characters in the $chars variable. shortCodeToUrl() – Convert the short code to long URL. validateShortCode() – Validate the short code based on the allowed characters.