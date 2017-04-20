0.3.0
- Added `removeDuplicate()` to remove duplicated numbers, and  send `notRepeat` with the rquest to mobily.ws to remove duplicated numbers.
- Added results proorty which holds all the results from sending sms
- The new balance will be requested with every send sms. 
- Added 'debug' option to config. if true var_dump sms will be called after sending the request. 
- if when() is called, a DeleteKey will be sent with request. You can retrieve this key from the results bag, and use it later to delete postponed messages.
- Added domain() function to include domainName with the request. 

