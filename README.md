# Animal-Shelter


Home Page: Nav to Admin, Staff, Food, and Veterinarian

Admin Page: Add branches Add and delete volunteers/employees Update Volunteer Hours View Shelter Branches, Staff, Employees, Volunteers Retrieve Volunteers with over X volunteer hours Select Query

Staff Page: Add animals Send animals to veterinarian Send animals to socialize Send animals to foster family Add supporter

Food Page: Feed animals Add donors and donation Add new food coming in Update Stock Delete Food Product View Food info, donor info, donation info, sorted stock, feeding info, animals fed by all volunteers

Veterinarian Page: Add/Delete Veterinarian Update Veterinarian Info Write checkup for animals View vet info and check up history

Queries
Projection:
Finds animal details according to attributes of interest

SELECT attribute1, attribute2, attribute3, attribute4, attribute5
FROM Animal

Division:
Finds animals that have been fed by all volunteers

SELECT a.animalID, a.animalName, a.gender, a.age
FROM Animal a
WHERE NOT EXISTS (SELECT v.staffID
                  FROM Volunteer v
                  WHERE NOT EXISTS (SELECT f.animalID
                                    FROM Feed f
                                    WHERE v.staffID = f.staffID AND f.animalID = a.animalID))

Selection:
Works as intended query by user.

SELECT $attributes
FROM $table
WHERE $filterBy
Output(if entered table is 'Animal', attributes are 'animalID, age', and filter by 'age>4'):

image

Aggregation by Having
Find the average age of Animals that is not null, for each gender with the average age of the grouped is grater than 6.

SELECT AVG(age), gender
FROM Animal
WHERE age is not null
GROUP BY gender
HAVING AVG(age)>6
Output:

image

Nested Aggregation
Find the age of the youngest Animal and average age of each gender with age >3 and the age is not null, for each gender for which the average age of the students who age >3 and the age is not null is higher than the average age of all Animals which age is not null across all genders.

SELECT S.gender, MIN(S.age), AVG(S.age)
FROM Animal S
GROUP BY S.gender
HAVING AVG(S.age) > (SELECT AVG(age) FROM Animal WHERE age is not null)
Output:

image

Join
Join Volunteer and Staff tables to return volunteer info that have worked more than X hours.

SELECT sm.staffID, sm.staffName, v.hoursVolunteered
FROM Volunteer v, StaffManages sm 
INNER JOIN v ON sm.staffID=v.staffID 
WHERE v.hoursVolunteered > $volunteerHours
User Input:

Screenshot 2023-08-09 143027

Output:

Screenshot 2023-08-09 143158

Aggregation with group-by
Return a sorted list of food in the stock that is not empty. Aggregated by target group.

SELECT f.target, sum(f.stock) 
FROM Food f 
GROUP BY f.target

Output: aggregation-group-by
