@echo off

echo open 10.164.79.200> ftpgetscript.txt

echo osseid>> ftpgetscript.txt

echo nmsadm275>> ftpgetscript.txt

echo get osssup/diskcek/QRY/dash/GUT1_DC_E_BSS_CELL_CS_RAW.csv>> ftpgetscript.txt
echo get osssup/diskcek/QRY/dash/GUT1_DC_E_ERBS_EUTRANCELLFDD_RAW.csv>> ftpgetscript.txt
echo get osssup/diskcek/QRY/dash/GUT1_DC_E_RAN_UCELL_RAW.csv>> ftpgetscript.txt
echo get osssup/diskcek/QRY/dash/GUT1_DC_E_RBS_HSDSCHRES_RAW.csv>> ftpgetscript.txt
echo get osssup/diskcek/QRY/dash/GUT2_DC_E_BSS_CELL_CS_RAW.csv>> ftpgetscript.txt
echo get osssup/diskcek/QRY/dash/GUT2_DC_E_ERBS_EUTRANCELLFDD_RAW.csv>> ftpgetscript.txt
echo get osssup/diskcek/QRY/dash/GUT2_DC_E_RAN_UCELL_RAW.csv>> ftpgetscript.txt
echo get osssup/diskcek/QRY/dash/GUT2_DC_E_RBS_HSDSCHRES_RAW.csv>> ftpgetscript.txt
echo get osssup/diskcek/QRY/dash/KAL_DC_E_BSS_CELL_CS_RAW.csv>> ftpgetscript.txt
echo get osssup/diskcek/QRY/dash/KAL_DC_E_ERBS_EUTRANCELLFDD_RAW.csv>> ftpgetscript.txt
echo get osssup/diskcek/QRY/dash/KAL_DC_E_RAN_UCELL_RAW.csv>> ftpgetscript.txt
echo get osssup/diskcek/QRY/dash/KAL_DC_E_RBS_HSDSCHRES_RAW.csv>> ftpgetscript.txt
echo get osssup/diskcek/QRY/dash/RAN7_DC_E_ERBS_EUTRANCELLFDD_RAW.csv>> ftpgetscript.txt
echo get osssup/diskcek/QRY/dash/RAN7_DC_E_RAN_UCELL_RAW.csv>> ftpgetscript.txt
echo get osssup/diskcek/QRY/dash/RAN7_DC_E_RBS_HSDSCHRES_RAW.csv>> ftpgetscript.txt
echo get osssup/diskcek/QRY/dash/TENG1_DC_E_BSS_CELL_CS_RAW.csv>> ftpgetscript.txt
echo get osssup/diskcek/QRY/dash/TENG1_DC_E_ERBS_EUTRANCELLFDD_RAW.csv>> ftpgetscript.txt
echo get osssup/diskcek/QRY/dash/TENG1_DC_E_RAN_UCELL_RAW.csv>> ftpgetscript.txt
echo get osssup/diskcek/QRY/dash/TENG1_DC_E_RBS_HSDSCHRES_RAW.csv>> ftpgetscript.txt
echo get osssup/diskcek/QRY/dash/TENG2_DC_E_BSS_CELL_CS_RAW.csv>> ftpgetscript.txt
echo get osssup/diskcek/QRY/dash/TENG2_DC_E_ERBS_EUTRANCELLFDD_RAW.csv>> ftpgetscript.txt
echo get osssup/diskcek/QRY/dash/TENG2_DC_E_RAN_UCELL_RAW.csv>> ftpgetscript.txt
echo get osssup/diskcek/QRY/dash/TENG2_DC_E_RBS_HSDSCHRES_RAW.csv>> ftpgetscript.txt


echo quit>> ftpgetscript.txt

ftp -s:ftpgetscript.txt