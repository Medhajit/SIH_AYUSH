# SIH_AYUSH
Grant Application Submission &amp; Tracking System for AYUSH Ministry

# Deployment Process
 Server Requirement: Linux Server. Required PHP version 5.4 should support cron
jobs.
 Database: MySQL database
 
# The process:

1. Source code is to be placed in the target directory of the deployment server.
2. Schema of MySQL database has been provided along with the code. This schema
should be imported into the target MySQL database.
3. The website was initially hosted in a temporary domain for testing purpose
(ayushgrant.in). So, this temporary domain name is present in parts of the source
code. This needs to be replaced with the new domain name in all pages of source
code.
4. PHP mail () function has been used in the code. So the mail-server must be same as
the domain server.
5. There are 2 cron-jobs which need to be deployed to the server. Cron-jobs will be
inside “cronjobs” folder in the code repository.
 “automaticreportrequest_CRONJOB.php” is the name of the first cron-job
which should be set to execute daily, i.e. at an interval of a day.
 “deletetemporaryapplication_CRONJOB.php” is the name of the second
cron-job which should be set to execute daily.
