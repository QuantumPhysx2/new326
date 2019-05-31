CREATE TABLE `hit326`.`customers`(
    `customerID` INT(32) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    `firstName` VARCHAR(32) NOT NULL,
    `lastName` VARCHAR(32) NOT NULL,
    `email` VARCHAR(64) UNIQUE NOT NULL,
    `password` VARCHAR(64) NOT NULL,
    `createdAt` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	INDEX (`customerID`)
) ENGINE = InnoDB;

CREATE TABLE `hit326`.`item`(
    `invoiceID` INT(32) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    `productID` INT(32) UNIQUE NOT NULL,
    `quantity` INT NOT NULL,
    `itemName` VARCHAR(64) NOT NULL,
	INDEX (`invoiceID`)
) ENGINE = InnoDB;

CREATE TABLE `hit326`.`invoice`(
    `customerID` INT(32) PRIMARY KEY NOT NULL,
    `invoiceID` INT(32) NOT NULL,
    `productID` INT(32) NOT NULL,
    `timePurchased` TIMESTAMP NOT NULL,
    FOREIGN KEY (`customerID`) REFERENCES customers (`customerID`),
    FOREIGN KEY (`productID`) REFERENCES item (`productID`),
	INDEX (`customerID`)
) ENGINE = InnoDB;

CREATE TABLE `hit326`.`cpus`(
    `productID` INT(32) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    `productName` VARCHAR(64) NOT NULL,
    `baseClock` INT NOT NULL,
    `boostClock` INT NOT NULL,
    `cores` INT NOT NULL,
    `threads` INT NOT NULL,
    `chipset` VARCHAR(8) NOT NULL,
    `cache` INT NOT NULL,
    `power` INT NOT NULL,
    `Price` INT NOT NULL,
    `Stock` INT NOT NULL,
    FOREIGN KEY (`productID`) REFERENCES item (`productID`),
	INDEX (`productID`)
) ENGINE = InnoDB;

CREATE TABLE `hit326`.`graphicsCard`(
    `productID` INT(32) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    `baseClock` INT NOT NULL,
    `boostClock` INT NOT NULL,
    `productName` VARCHAR(64) NOT NULL,
    `vram` INT NOT NULL,
    `memoryType` VARCHAR(8) NOT NULL,
    `gpuPrice` INT NOT NULL,
    `gpuStock` INT NOT NULL,
    FOREIGN KEY (`productID`) REFERENCES item (`productID`),
	INDEX (`productID`)
) ENGINE = InnoDB;

CREATE TABLE `hit326`.`memory`(
    `productID` INT(32) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    `productName` VARCHAR(64) NOT NULL,
    `size` INT NOT NULL,
    `stickConfig` VARCHAR(8) NOT NULL,
    `frequency` INT NOT NULL,
    `Price` INT NOT NULL,
    `Stock` INT NOT NULL,
    FOREIGN KEY (`productID`) REFERENCES item (`productID`),
	INDEX (`productID`)
) ENGINE = InnoDB;
