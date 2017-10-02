#!/bin/bash

touch file_transfer_list.txt

printf "\n\n";
printf "start to compile files ......................................\n"; 

DOMAIN='wsb4656595601'

find -type f -name "*.php" | while read filename;
do
    if grep -q '* please compile me' "$filename"; then
	printf "compiling: $filename \n";
	
	awk -f handle_file.awk $filename

	DESTINATION=$( echo $filename | awk '{print substr( $0, 3 ) }' );
        DESTINATION="$DOMAIN/$DESTINATION";
	
#	echo  "put $filename $DESTINATION";
	echo  "put $filename $DESTINATION" >> file_transfer_list.txt
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

sftp -o "batchmode no" -b file_transfer_list.txt $USER@$HOST

printf "done\n";
printf "\n\n";
rm file_transfer_list.txt


