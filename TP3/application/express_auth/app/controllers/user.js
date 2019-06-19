User = require('../models/user');

exports.index = function (req, res) {
    User.get(function (err, users) {
        if (err) {
            res.json({
                status: "error",
                message: err,
            });
        }
        res.json({
            status: "success",
            message: "Users retrieved successfully",
            data: users
        });
    });
};

exports.new = function (req, res) {
    var user = new User();
    user.name = req.body.name ? req.body.name : user.name;
    user.password = req.body.password;
    user.email = req.body.email;
    user.save(function (err) {
        res.json({
            message: 'New user created!',
            data: user
        });
    });
};

exports.view = function (req, res) {
    User.findById(req.params.user_id, function (err, user) {
        if (err)
            res.send(err);
        res.json({
            message: 'User details loading..',
            data: user
        });
    });
};

exports.update = function (req, res) {
    User.findById(req.params.user_id, function (err, user) {
        if (err)
            res.send(err);
        user.name = req.body.name ? req.body.name : user.name;
        user.gender = req.body.gender;
        user.email = req.body.email;
        user.phone = req.body.phone;
        user.save(function (err) {
            if (err)
                res.json(err);
            res.json({
                message: 'User Info updated',
                data: user
            });
        });
    });
};

exports.delete = function (req, res) {
    User.remove({
        _id: req.params.user_id
    }, function (err, user) {
        if (err)
            res.send(err);
        res.json({
            status: "success",
            message: 'User deleted'
        });
    });
};

exports.authenticate = function (req, res) {
    User.findOne({"name": req.body.name}, function (err, user) {
        if (err) {
            res.json({
                code: 500,
                errorName: err.name,
                message: err.message,
                details: err.errors
            });
        } else if (user) {
            if (user.matchesPassword(req.body.password)) {
                res.json({
                    code: 200,
                    message: 'Login successful!',
                    data: {
                        user: user.name,
                        token: user.getToken()
                    }
                });
            } else {
                res.json({
                    code: 400,
                    message: 'User or password incorrect!',
                    data: req.body
                });
            }
        }
    });
};

exports.update_token = function (req, res) {
    User.findOne({"name": req.body.user, "token": req.body.token}, function (err, user) {
        if (err) {
            res.json({
                code: 500,
                errorName: err.name,
                message: err.message,
                details: err.errors
            });
        } else if (user) {
            user.renewToken();
            res.json({
                code: 200,
                message: 'Token renewed!',
                data: {
                    user: user.name,
                    token: user.getToken()
                }
            });
        } else {
            res.json({
                code: 400,
                message: 'Incorrect user or token!',
                data: req.body
            });
        }
    });
};

exports.valid_token = function (req, res) {
    User.findOne({"name": req.body.user, "token": req.body.token}, function (err, user) {
        if (err) {
            res.json({
                code: 500,
                errorName: err.name,
                message: err.message,
                details: err.errors
            });
        } else if (user) {
            res.json({
                code: 200,
                message: 'Valid user and token!',
                data: req.body
            });
        } else {
            res.json({
                code: 400,
                message: 'Incorrect user or token!',
                data: req.body
            });
        }
    });
};
