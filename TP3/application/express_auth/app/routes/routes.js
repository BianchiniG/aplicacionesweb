let router = require('express').Router();

router.get('/', function (req, res) {
    res.json({
        status: 'API Its Working',
        message: 'Welcome to RESTHub crafted with love!',
    });
});

var userController = require('../controllers/user');

router.route('/user')
    .get(userController.index)
    .post(userController.new);
router.route('/user/authenticate').post(userController.authenticate);
router.route('/user/update_token').post(userController.update_token);
router.route('/user/valid_token').post(userController.valid_token);

module.exports = router;
