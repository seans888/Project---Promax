ALTER TABLE `usertypeaccesslevel`
ADD FOREIGN KEY (`UserType_code`) REFERENCES `usertype` (`code`) ON DELETE CASCADE ON UPDATE CASCADE;
