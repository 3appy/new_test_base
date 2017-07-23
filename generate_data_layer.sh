#!/bin/bash

touch file_transfer_list.txt

printf "\n\n";
printf "start to compile files ......................................\n"; 

DOMAIN='wsb4656595601'

find -type f -name "*.php" | while read filename;
do
    if grep -q '* generate me' "$filename"; then
	MYFILE=$( echo $filename | awk 'BEGIN { FS="/" } {print $NF }' );
	MYFILE=$( echo $MYFILE | awk '{print substr( $0, 0, length($0) - 4 ) }' );
	printf "compiling myfile: $MYFILE \n";

	DEST_GENERATED_MODEL="$DOMAIN/data/generated/class.generated_$MYFILE.php";
	DEST_GENERATED_LIST_MODEL="$DOMAIN/data/generated/class.generated_$MYFILE"'_'"list.php";
	DEST_MODEL="$DOMAIN/data/class.$MYFILE.php";	
	DEST_LIST_MODEL="$DOMAIN/data/class.$MYFILE"'_'"list.php";
	
	ORG_GENERATED_MODEL="data/generated/class.generated_$MYFILE.php";
	ORG_GENERATED_LIST_MODEL="data/generated/class.generated_$MYFILE"'_'"list.php";
	ORG_MODEL="data/class.$MYFILE.php";	
	ORG_LIST_MODEL="data/class.$MYFILE"'_'"list.php";

	rm "$ORG_GENERATED_MODEL";	
	touch "$ORG_GENERATED_MODEL";

	rm "$ORG_GENERATED_LIST_MODEL";	
	touch "$ORG_GENERATED_LIST_MODEL";

	if [ ! -f $ORG_MODEL ]; then
	    { touch "$ORG_MODEL"; }
	fi

	if [ ! -f $ORG_LIST_MODEL ]; then
	    { touch "$ORG_LIST_MODEL"; }
	fi
	
	awk -v GEN_MODEL="$ORG_GENERATED_MODEL" -v GEN_LIST_MODEL="$ORG_GENERATED_LIST_MODEL" -f generatefile.awk $filename
    fi
done
echo "quit" >> file_transfer_list.txt

printf "done\n";
printf "\n\n";
printf "start to remove files ......................................\n"; 

# removing all temporary files
find -type f -name "*.*~" | while read filename;
do
    printf "file to delete: " $filename "\n"
    rm $filename;
    printf "removed file: " $filename "\n"
done

HOST='home219019557.1and1-data.host'
USER='u46565956'
PASSWD='23Bernd'


printf "done\n";
printf "\n\n";
printf "start to transfer files ......................................";
printf "to Domain: $DOMAIN \n";

cat  file_transfer_list.txt 

#sftp -o "batchmode no" -b file_transfer_list.txt $USER@$HOST

#printf "done\n";
#printf "\n\n";
rm file_transfer_list.txt


