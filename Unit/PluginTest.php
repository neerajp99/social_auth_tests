<?php

use Drupal\Tests\UnitTestCase;
use Drupal\social_auth\Plugin\Block\SocialAuthLoginBlock;
use Drupal\Core\Block\BlockBase;
use Drupal\Core\Config\ImmutableConfig;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\social_auth\Plugin\Network\NetworkInterface;
use Drupal\social_api\Plugin\NetworkInterface as NetworkInterfaceBase;

class NetworkTest extends UnitTestCase {

  protected $current_user;
  protected $plugin_id;
  protected $plugin_definition;
  protected $social_auth_config;

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

  /**
   * tests for class SocialAuthLoginBlock
   */

  public function testSocialAuthLoginBlock () {
    $this->configuration = array();
    $this->social_auth_config = $this->createMock(ImmutableConfig::class);
    $collection = $this->getMockBuilder('Drupal\social_auth\Plugin\Block\SocialAuthLoginBlock')
                       ->setConstructorArgs(array($this->configuration, $this->plugin_id, $this->plugin_definition, $this->social_auth_config))
                       ->getMock();
    $this->assertTrue(
        method_exists($collection, 'create'),
          'OAuth2Manager does not implements create function/method'
        );
    $this->assertTrue(
        method_exists($collection, 'build'),
          'OAuth2Manager does not implements build function/method'
        );
    $collection->method('build')
               ->willReturn(['#theme' => 'login_with', '#social_networks' => $this->social_auth_config->get('auth')]);
    // $encoded = json_encode($collection->build()['#theme']);
    // $this->assertInternalType('string', $encoded);
    $this->assertEquals(['#theme' => 'login_with', '#social_networks' => $this->social_auth_config->get('auth')], $collection->build());
  }
}


 ?>
