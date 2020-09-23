# subscriptions-simulation-client-php

This API lets you manage the subscriptions to API Hub asynchronous events. It enables you to receive notifications (asynchronous events) from Círculo de Crédito next-generation products (Open Banking &amp; Data Aggregation).

## Requisitos

PHP >= 7.1

### Dependencias adicionales
- Se debe contar con las siguientes dependencias de PHP:
    - ext-curl
    - ext-mbstring
- En caso de no ser así, para linux use los siguientes comandos
```sh
#ejemplo con php en versión 7.3 para otra versión colocar php{version}-curl
apt-get install php7.3-curl
apt-get install php7.3-mbstring
```
- Composer [vea como instalar][1]

## Instalación

Ejecutar: `composer install`

## Guía de inicio

### Paso 1. Agregar el producto a la aplicación

Al iniciar sesión seguir los siguientes pasos:

1.  Dar clic en la sección "**Mis aplicaciones**".
2.  Seleccionar la aplicación.
3.  Ir a la pestaña de "**Editar '@tuApp**' ".
    <p align="center">
      <img src="https://github.com/APIHub-CdC/imagenes-cdc/blob/master/edit_applications.jpg" width="900">
    </p>
4.  Al abrirse la ventana, seleccionar el producto.
5.  Dar clic en el botón "**Guardar App**":
    <p align="center">
      <img src="https://github.com/APIHub-CdC/imagenes-cdc/blob/master/selected_product.jpg" width="400">
    </p>

### Paso 2. Capturar los datos de la petición

Los siguientes datos a modificar se encuentran en **test/Api/ApiTest.php**

Es importante contar con el setUp() que se encargará de inicializar la url. Modificar la URL **('the_url')** de la petición del objeto **_\$config_**, como se muestra en el siguiente fragmento de código:

```php
 public function setUp()
    {
        $config = new Configuration();
        $config->setHost('the_url');
        $this->x_api_key = "your_api_key";
        $client = new \GuzzleHttp\Client();
        $this->apiInstance = new WebHookSubscriptionsApi($client,$config);
    }  
/**
* Este es el método que se será ejecutado en la prueba ubicado en path/to/repository/test/Api/ApiTest.php
*/
public function testPostSubscription()
    {
        try {
            $enrollment = new Subscription();

            $enrollment->setEventType("mx.com.circulolaboral.employmentcheck");
            $enrollment->setWebHookUrl("your_url");
            $enrollment->setEnrollmentId($this->gen_uuid());


            $result = $this->apiInstance->postSubscription($this->x_api_key, $enrollment, null);
            print_r($result);
            
            if($result['subscription']!=null){
                //Get by subscription_id
                $this->getSubscriptions($result['subscription']['subscription_id']);

                //Delete by subscription_id
                $this->deleteSubscription($result['subscription']['subscription_id']);
            }
        } catch (ApiException | Exception $e) {
            echo 'Exception when calling WebHookSubscriptionsApiTest->testPostSubscription: ', $e->getMessage(), PHP_EOL;
        }
    }


    public function testGetList(){
        try {
            $page = 1;
            $per_page = 5;
            $result = $this->apiInstance->getSubscriptions($this->x_api_key, $page, $per_page);
            print_r($result);
        } catch (ApiException | Exception $e) {
            echo 'Exception when calling WebHookSubscriptionsApiTest->testGetList: ', $e->getMessage(), PHP_EOL;
        }
    }
    public function getSubscriptions($subscription_id)
    {
        try {
                $result = $this->apiInstance->getSubscription($this->x_api_key, $subscription_id);
                print_r($result);
        } catch (ApiException | Exception $e) {
            echo 'Exception when calling WebHookSubscriptionsApiTest->getSubscriptions: ', $e->getMessage(), PHP_EOL;
        }
    }

    public function deleteSubscription($subscription_id)
    {
        try {
            $result = $this->apiInstance->deleteSubscription($this->x_api_key, $subscription_id);
            print_r($result);
        } catch (ApiException | Exception $e) {
            echo 'Exception when calling WebHookSubscriptionsApiTest->deleteSubscription: ', $e->getMessage(), PHP_EOL;
        }
    }
```

## Pruebas unitarias

Para ejecutar las pruebas unitarias:

```sh
./vendor/bin/phpunit
```

[1]: https://getcomposer.org/doc/00-intro.md#installation-linux-unix-macos
