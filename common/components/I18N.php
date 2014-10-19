<?php

namespace common\components;

use common\models\Language;
use yii\helpers\ArrayHelper;

/**
 * Description of I18N
 *
 * @author vlysychenko
 */
class I18N extends \Zelenin\yii\modules\I18n\components\I18N {

    public function init() {
        $this->languages = ArrayHelper::getColumn(Language::find()
                                ->select('locale')->all(), 'locale');
        parent::init();
    }

}
