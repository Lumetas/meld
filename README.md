# meld
meld - это готовый компонент, для создания админ панели, для веб приложений на базе фреймворка meract

## Установка
Выполните из корня вашего проекта на meract
```
git clone https://github.com/lumetas/meld.git
```

Пример использования:
```
use Meld\Meld;
class test {
	public static function testRoute($rq) {
		return new Response("test");
	}
}

Meld::registerPage("test", [test::class, "testRoute"], "every");

Route::get('/admin', [Meld::class, "show"]);
```

В данном примере мы подключаем Meld, создаём тестовый класс с тестовым методом, который по синтаксису как обычный контроллер. И регистрируем его как страницу.После вешаем отрисовку админ панели в путь `/admin`


Про регистрацию. 
Meld:registerPage(string $name, callable $backload, $backloadType);
- $name - Это имя, отображаемое на кнопке в меню и имя создаваемого морфа.
- $backload - метод используемый для получения содержимого морфа.
- $backloadType - стандартный типы.


Добавить middleware к админ панели:
```
Route::get('/admin', [Meld::class, "show"], $middleware);
```
