#!/bin/bash
echo "N: $1"
for(( i=1; i<=$1; i++ ))
do
git add -A && git commit -am "rebase $1" && git push origin HEAD:dev -u && git rebase --continue || git rebase --continue || git push origin HEAD:dev -uf || echo "loop: $i"
done 