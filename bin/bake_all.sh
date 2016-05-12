declare -a arr=("plane_types" "groups" "airports" "customer_types" "customers" "planes" "users" "flights" "users_flights" "airports_flights" "invoices")

## now loop through the above array
for i in "${arr[@]}"
do
echo ""
echo "-------$i-------"

/home/david/webdev/C/bin/cake bake all $i <<EOF
y
y
y
y
y
y
y
y
y
y
y
y
y
y
y
y
y
y
y
y
y
y
y
y
y
y
y
EOF

done
