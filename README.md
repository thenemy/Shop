Path

Product --- Order --- Basket( has many orders) --- User Order(orders which was purchased)

If the User order created by cash/instance payment and without delivery No addition raws in other table won`t created.
The status will be waiting to be taken. When it receives the product the status of user order will be updated to
received.

if the user order created by cash/instance payment and delivery the row in the delivery table would be created, all
required for delivery data will be filled the status of user order will be changed to in the path after receiving the
product will be changed to received

if the user order created by credit and without delivery The status will be waiting to be taken After getting will be in
progress of payment after will be everything is okay

if the user decides to return the product it will send the message to admin panel after message will be progressed

this can be done only throughout 3 days the admin will fill data where to return the product the some amount of money
will be charged for returning the product from the client

there can be errors during payment installment , this error will be send to the client , and will be asked to send
request one more time when money will be enough or just

Also , a have to make the way to fill files through temporary conditions, and I could do the same with others

So , will fill all required data about the user user datas, user plastic cards, user addresses , start giving the roles

Also, I have to fill all required data about the shop: shop address , shop status

Insert available cities , it is important for filling the address

When everything will be ready I could start filling about the order

When we create installment we have to choose the user Then we are choosing the products which we want to send Then we
choose the choice of installment then we choose the address where to go, or check the existing address the type of the
payment for initially price

when we create transactions we have to choose user then products then the address    
the type of payment

in the user table will be the button to open window for nested transactions two types installment and instance payment

in the product table will be the button to open windows for netsted transactions two types installment and instant
payment

take account the discounts of the product when withdrawing money will be mutual exclusive , namely first discounts which
is in banners if not exists which is in products

Check ALL JOBS IMPORTANT

REWRITE MONTH in MONTH PAID MAKE IT THE DATE FIELD 

