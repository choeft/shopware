SET FOREIGN_KEY_CHECKS=0;
DELETE FROM s_order;

INSERT INTO `s_order` (`ordernumber`, `userID`, `invoice_amount`, `invoice_amount_net`, `paymentID`, `dispatchID`, `invoice_shipping`, `invoice_shipping_net`, `ordertime`, `status`, `cleared`, `transactionID`, `comment`, `customercomment`, `internalcomment`, `net`, `taxfree`, `partnerID`, `temporaryID`, `referer`, `cleareddate`, `trackingcode`, `language`, `currency`, `currencyFactor`, `subshopID`, `remote_addr`, `deviceType`) VALUES
    ('20001', 1, 100.00, 90.00, 4, 8, 0, 0, '2012-08-30 10:15:00', 0, 0, '', '', '', '', 0, 0, '', '', '', NULL, '', '1', 'EUR', 1, 1, '', NULL),
    ('20002', 2, 200.00, 80.00, 1, 9, 0, 0, '2012-08-30 15:20:00', 0, 0, '', '', '', '', 0, 0, '', '', '', NULL, '', '1', 'EUR', 1, 1, '', NULL),
    ('20003', 3, 300.00, 70.00, 2, 6, 0, 0, '2012-08-30 15:25:00', 0, 0, '', '', '', '', 0, 0, '', '', '', NULL, '', '1', 'EUR', 1, 1, '', NULL),
    ('20004', 3, 400.00, 60.00, 3, 9, 0, 0, '2012-08-30 15:30:00', 0, 0, '', '', '', '', 0, 0, '', '', '', NULL, '', '1', 'EUR', 1, 1, '', NULL),
    ('20005', 4, 200.00, 50.00, 4, 9, 0, 0, '2012-08-30 15:35:00', 0, 0, '', '', '', '', 0, 0, '', '', '', NULL, '', '1', 'EUR', 1, 1, '', NULL),
    ('20006', 2, 250.00, 85.00, 1, 7, 0, 0, '2012-08-30 15:40:00', 0, 0, '', '', '', '', 0, 0, '', '', '', NULL, '', '1', 'EUR', 1, 1, '', NULL),
    ('20007', 5, 350.00, 75.00, 3, 8, 0, 0, '2012-08-30 15:45:00', 0, 0, '', '', '', '', 0, 0, '', '', '', NULL, '', '1', 'EUR', 1, 1, '', NULL),
    ('20008', 6, 150.00, 10.00, 4, 7, 0, 0, '2012-08-30 15:50:00', 0, 0, '', '', '', '', 0, 0, '', '', '', NULL, '', '1', 'EUR', 1, 1, '', NULL);

SET FOREIGN_KEY_CHECKS=1;