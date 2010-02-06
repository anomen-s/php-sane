#!/bin/bash

if [ `whoami` != "root" ] ; then
	echo "Error: You must be root to execute this program, but you are `whoami`."
	exit -1
fi

echo -n "Checking for apache ... "
if [ `which apache` ] ; then echo OK ; else echo Failed&&exit -1 ; fi

echo -n "Checking for sane-find-scanner ... "
sane_find_scanner=`which sane-find-scanner`
if [ $sane_find_scanner ] ; then echo OK ; else echo Failed&&exit -1 ; fi

echo -n "Checking for scanimage ... "
scanimage=`which scanimage`
if [ $scanimage ] ; then echo OK ; else echo Failed&&exit -1 ; fi

echo -n "Checking for pnmtotiff ... "
pnmtotiff=`which pnmtotiff`
if [ $pnmtotiff ] ; then echo OK ; else echo Failed&&exit -1 ; fi

echo -n "Checking for apache php-module \"libphp4.so\" ... "
if [ `locate libphp4.so` ] ; then echo OK ; else echo Failed&&exit -1 ; fi

STD=`locate -e /etc/*/httpd.conf|head -n1`
echo -n "Location of your httpd.conf [$STD] : "
read httpd_conf
if [ ! $httpd_conf ] ; then httpd_conf=$STD ; fi

STD=`grep -i '^User' ${httpd_conf}|cut -d' ' -f2`:`grep -i '^Group' ${httpd_conf}|cut -d' ' -f2`
echo -n "User under which your apache runs [$STD] : "
read httpd_own
if [ ! $httpd_own ] ; then httpd_own=$STD ; fi

STD=`grep -i '^DocumentRoot' ${httpd_conf}|cut -d' ' -f2`/phpSANE
echo -n "Location of phpSANE [$STD] : "
read target_dir
if [ ! $target_dir ] ; then target_dir=$STD ; fi
rm -fr $target_dir

echo -n "Copying phpSANE ... "
cp -a phpSANE $target_dir
cd $target_dir
echo OK

echo -n "Setting permissions ... "
chown -R $httpd_own .
chmod 0600 .htaccess
chmod 0700 tmp
echo OK

echo "Now you must edit the config.php and the .htaccess."
echo "For more details read the README."
