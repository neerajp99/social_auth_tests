<?php

use Drupal\Tests\UnitTestCase;
use PHPUnit\Framework\TestCase;
use Drupal\social_auth\Entity\SocialAuth;
use Drupal\Core\Entity\ContentEntityBase;
use Drupal\Core\Field\BaseFieldDefinition;
use Drupal\Core\Entity\EntityTypeInterface;
use Drupal\Core\Entity\ContentEntityInterface;

class EntityTest extends UnitTestCase {
  protected $setting = array();
  /**
   * __construct function
   */
  public function __construct() {
       parent::__construct();
   }

  /**
   * {@inheritdoc}
   */
   public function setUp() {
     parent::setUp();
   }

   public function testSocialAuth () {
     $collection = $this->createMock(SocialAuth::class);
     // $collection = new SocialAuth();
     $collection->setAdditionalData('drupal123');
     // var_dump($this->get('additional_data'));

     // $collection = $this->createMock(SocialAuth::class);
     //
     // // $fields['id'] = BaseFieldDefinition::create('integer')
     // //     ->setLabel(t('ID'))
     // //     ->setDescription(t('The ID of the Social Auth record.'))
     // //     ->setReadOnly(TRUE)
     // //     ->setSetting('unsigned', TRUE);
     //
     // $settings = $this->createMock(BaseFieldDefinition::class);
     // $this->setting['id'] = $settings::create('entity_reference');
     $this->assertTrue(true);
   }
}





 ?>
