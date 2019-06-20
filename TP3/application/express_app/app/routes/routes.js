let router = require('express').Router();

router.get('/', function (req, res) {
    res.json({
        status: 'API Its Working',
        message: 'Welcome to RESTHub crafted with love!',
    });
});

var activityController = require('../controllers/activity');
var tagController = require('../controllers/tag');

router.route('/activity')
    .get(activityController.index)
    .post(activityController.new)
    .put(activityController.update);
router.route('/activity/:id')
    .get(activityController.view)
    .delete(activityController.delete);
router.route('/activity/:tag').get(activityController.getByTag);
router.route('/activity/:coordinates').get(activityController.getByCoordinates);
router.route('/activity/:dates').get(activityController.getBetweenDates);
router.route('/activity/:keyword').get(activityController.getByKeyword);

router.route('/test').get(activityController.test);

router.route('/tag')
    .get(tagController.index)
    .post(tagController.new)
    .put(tagController.update);
router.route('/tag/:id')
   .get(tagController.view)
   .delete(tagController.delete);
router.route('/tags/:name').get(tagController.getByName);
router.route('/tags/:keyword').get(tagController.getByKeyword);

module.exports = router;
