use("Adam")
db.emp.find({}).projection({}).sort({_id:-1}).limit(100)