#!/bin/bash
./symfony project:deploy production --go && \
ssh smallkaa@g6.vodkapenis.com "cd /var/www/gym6/ && ./symfony cc && ./symfony doctrine:build-filters && ./symfony doctrine:build-forms && \
./symfony configure:database 'mysql:host=localhost;dbname=gym6' gym6 gym6ovich"
