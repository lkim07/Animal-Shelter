# Animal-Shelter
Site directory

Home Page:
Nav to Admin, Staff, Food, and Veterinarian

Admin Page:
Add branches
Add and delete volunteers/employees
Update Volunteer Hours
View Shelter Branches, Staff, Employees, Volunteers
Retrieve Volunteers with over X volunteer hours
Select Query

Staff Page:
Add animals
Send animals to veterinarian
Send animals to socialize
Send animals to foster family
Add supporter

Food Page:
Feed animals
Add donors and donation
Add new food coming in
Update Stock
Delete Food Product
View Food info, donor info, donation info, sorted stock, feeding info, animals fed by all volunteers

Veterinarian Page:
Add/Delete Veterinarian
Update Veterinarian Info
Write checkup for animals
View vet info and check up history

# Queries

# Projection:
Finds animal details according to attributes of interest

```
SELECT attribute1, attribute2, attribute3, attribute4, attribute5
FROM Animal

```

# Division:
Finds animals that have been fed by all volunteers

```
SELECT a.animalID, a.animalName, a.gender, a.age
FROM Animal a
WHERE NOT EXISTS (SELECT v.staffID
                  FROM Volunteer v
                  WHERE NOT EXISTS (SELECT f.animalID
                                    FROM Feed f
                                    WHERE v.staffID = f.staffID AND f.animalID = a.animalID))

```

# Selection: 
Works as intended query by user.
```
SELECT $attributes
FROM $table
WHERE $filterBy
```

Output(if entered table is 'Animal', attributes are 'animalID, age', and filter by 'age>4'):

<img width="175" alt="image" src="https://media.github.students.cs.ubc.ca/user/18492/files/4d12cb45-0d39-4152-acd9-758088956b60">




# Aggregation by Having
Find the average age of Animals that is not null, for each gender with the average age of the grouped is grater than 6.
```
SELECT AVG(age), gender
FROM Animal
WHERE age is not null
GROUP BY gender
HAVING AVG(age)>6
```

Output:

![image](https://media.github.students.cs.ubc.ca/user/18492/files/a7918028-238f-4ec5-9199-a42718ad4f50)


# Nested Aggregation
Find the age of the youngest Animal and average age of each gender with age >3 and the age is not null, for each gender for which the average age of the students who age >3 and the age is not null is higher than the average age of all Animals which age is not null across all genders.
```
SELECT S.gender, MIN(S.age), AVG(S.age)
FROM Animal S
GROUP BY S.gender
HAVING AVG(S.age) > (SELECT AVG(age) FROM Animal WHERE age is not null)
```

Output:

![image](https://media.github.students.cs.ubc.ca/user/18492/files/501456ec-160b-4596-bebc-22406d6666d9)

# Join
Join Volunteer and Staff tables to return volunteer info that have worked more than X hours.
```
SELECT sm.staffID, sm.staffName, v.hoursVolunteered
FROM Volunteer v, StaffManages sm 
INNER JOIN v ON sm.staffID=v.staffID 
WHERE v.hoursVolunteered > $volunteerHours
```
User Input:

<img width="625" alt="Screenshot 2023-08-09 143027" src="https://media.github.students.cs.ubc.ca/user/7322/files/0cbd49e0-f36f-4a84-ace7-b3ab05afaacb">

Output:

<img width="241" alt="Screenshot 2023-08-09 143158" src="https://media.github.students.cs.ubc.ca/user/7322/files/fbddf7de-83b0-4c60-8fd4-4f104be60aeb">

# Aggregation with group-by
Return a sorted list of food in the stock that is not empty. Aggregated by target group.

```
SELECT f.target, sum(f.stock) 
FROM Food f 
GROUP BY f.target

```

Output:
![aggregation-group-by](https://media.github.students.cs.ubc.ca/user/7322/files/a40227a7-4b24-43f7-93c4-787b604df7ba)
