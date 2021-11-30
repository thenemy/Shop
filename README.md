Path 

Product --- Order --- Basket( has many orders) --- User Order(orders which was purchased)

If the User order created by cash/instance payment and without delivery 
No addition raws in other table won`t created.
The status will be waiting to be taken.
When it receives the product the status of user order will be updated to received.

if the user order created by cash/instance payment and delivery 
the row in the delivery table would be created, 
all required for delivery data will be filled
the status of user order will be changed to in the path 
after receiving the product will be changed to received 

if the user order created by credit and without delivery
The status will be waiting to be taken
After getting will be in progress of payment 
after will be everything is okay 

if the user decides to return the product 
it will send the message to admin panel 
after message will be progressed 

this can be done only throughout 3 days
the admin will fill data where to return the product
the some amount of  money will be charged for returning the product
from the client

there  can be errors during payment installment , this error 
will be send to the client , and will be asked to send request one more time when money will be enough
or just 
