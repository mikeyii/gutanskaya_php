<?php
return [
	['GET','/','Home#index','home'],
	['POST','/','Home#index'],
	['GET','/reg','Reg#index','reg'],
	['POST','/reg','Reg#reg'],
	['GET','/login','Login#index','login'],
	['POST','/login','Login#login'],
	['GET', '/dashboard', 'Dashboard#index', 'dashboard'],
	['GET', '/exit', 'Dashboard#exit_u', 'exit'],
	['GET', '/order', 'Order#index', 'order'],
	['POST', '/order', 'Order#index'],
	['GET', '/order-go', 'Order#go', 'order_go'],
	['POST', '/order-go', 'Order#send_order']
];