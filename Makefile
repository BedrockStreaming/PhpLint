SHELL=bash
SOURCE_DIR = $(shell pwd)
BASE_DIR = ${SOURCE_DIR}/..
BIN_DIR ?= ${SOURCE_DIR}/bin
COMPOSER_BIN := $(shell type -P composer)

install: composer-install

test: atoum

quality: coke phplint

atoum:
	$(info ======= TEST atoum =======)
	${BIN_DIR}/atoum Tests/Units/Command/Linter.php

coke:
	$(info ======= TEST coke =======)
	${BIN_DIR}/coke


phplint:
	$(info ======= TEST phplint =======)
	${BIN_DIR}/phplint \
		${SOURCE_DIR}/Command

#COMPOSER

composer-install: ${COMPOSER_BIN}
	$(info ======= COMPOSER INSTALL =======)
	$< --no-interaction install --prefer-dist
