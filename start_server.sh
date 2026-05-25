#!/bin/bash

set -e

PORT=${1:-8081}
DOCROOT=${2:-examples}

if [ ! -d "vendor" ]; then
    echo "vendor/ not found. Running composer install..."
    composer install
fi

echo "Starting PHP development server on http://localhost:$PORT"
echo "Serving from: http://localhost:$PORT/"
echo "Press Ctrl+C to stop."

php -S localhost:$PORT -t $DOCROOT
