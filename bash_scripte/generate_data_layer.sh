#!/bin/bash

touch file_transfer_list.txt

printf "\n\n";
printf "start to compile files ......................................\n"; 

DOMAIN='wsb4656595601'

find ../ -type f -name "*.php" | while read filename;
do
    if grep -q '* generate me' "$filename"; then
	printf "finding: $filename \n";	
	
	# extracting the name of the file without path and extension 
	MYFILE=$( echo $filename | awk 'BEGIN { FS="/" } {print $NF }' );
	MYFILE=$( echo $MYFILE | awk '{print substr( $0, 0, length($0) - 3 ) }' );
	printf "rare filename: $MYFILE \n";	

	ORG_GENERATED_MODEL="../data/generated/class.generated_$MYFILE.php";
	ORG_GENERATED_LIST_MODEL="../data/generated/class.generated_$MYFILE"'_'"list.php";
	ORG_MODEL="../data/class.$MYFILE.php";	
	ORG_LIST_MODEL="../data/class.$MYFILE"'_'"list.php";
	ORG_API_MODEL="../api/$MYFILE.php";
	
	printf "\n";	
	printf " $ORG_GENERATED_MODEL \n";
	printf " $ORG_GENERATED_LIST_MODEL \n";
	printf " $ORG_MODEL \n";
	printf " $ORG_LIST_MODEL \n";	
	printf " $ORG_API_MODEL \n";		
	printf "\n";	

	DEST_GENERATED_MODEL="$DOMAIN/data/generated/class.generated_$MYFILE.php";
	DEST_GENERATED_LIST_MODEL="$DOMAIN/data/generated/class.generated_$MYFILE"'_'"list.php";
	DEST_MODEL="$DOMAIN/data/class.$MYFILE.php";	
	DEST_LIST_MODEL="$DOMAIN/data/class.$MYFILE"'_'"list.php";
	DEST_API_MODEL="$DOMAIN/api/$MYFILE.php";

	printf "\n";	
	printf " $DEST_GENERATED_MODEL \n";
	printf " $DEST_GENERATED_LIST_MODEL \n";
	printf " $DEST_MODEL \n";
	printf " $DEST_LIST_MODEL \n";	
	printf " $DEST_API_MODEL \n";		
	printf "\n";	

	echo  "put $ORG_GENERATED_MODEL $DEST_GENERATED_MODEL" >> file_transfer_list.txt
	echo  "put $ORG_GENERATED_LIST_MODEL $DEST_GENERATED_LIST_MODEL" >> file_transfer_list.txt	
	echo  "put $ORG_MODEL $DEST_MODEL" >> file_transfer_list.txt	
	echo  "put $ORG_LIST_MODEL $DEST_LIST_MODEL" >> file_transfer_list.txt	
	echo  "put $ORG_API_MODEL $DEST_API_MODEL" >> file_transfer_list.txt	

	printf " $ORG_GENERATED_MODEL \n";
	rm "$ORG_GENERATED_MODEL";	
	touch "$ORG_GENERATED_MODEL";
	awk -v GEN_MODEL="$ORG_GENERATED_MODEL" -f generated_model.awk $filename

	printf " $ORG_GENERATED_LIST_MODEL \n";	
	rm "$ORG_GENERATED_LIST_MODEL";	
	touch "$ORG_GENERATED_LIST_MODEL";
	awk -v GEN_LIST_MODEL="$ORG_GENERATED_LIST_MODEL" -f generated_model_list.awk $filename
	
#	rm "$ORG_API_MODEL";	
#	touch "$ORG_API_MODEL";	

#	if [ ! -f $ORG_MODEL ]; then
#	    { touch "$ORG_MODEL"; }
#	fi

#	if [ ! -f $ORG_LIST_MODEL ]; then
#	    { touch "$ORG_LIST_MODEL"; }
#	fi

#	printf "compiling myfile: $MYFILE \n";	
#	printf "\n";	


	
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


