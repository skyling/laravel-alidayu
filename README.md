# laravel 阿里大鱼

### 在.env文件中添加配置
```
	ALIDAYU_SIGN=签名
	ALIDAYU_APP_KEY=阿里大鱼AppKey
	ALIDAYU_SECRET_KEY=阿里大鱼SecretKey
```
### 在config/app.php 配置文件中
在`providers`数组中添加
`Skyling\Alidayu\AlidayuServiceProvider::class`

### 在 `aliases` 数组中添加

'Alidayu' => \Skyling\Alidayu\Facade\Alidayu::class,

### 使用:
```
	// 发送短信
	Alidayu::sendSms('手机号', '阿里大鱼模板ID', [参数数组]);
	// 获取响应对象
    Alidayu::getResponse();
    // 判断是否发送成功
    Alidayu::isSuccess(); 
    // 获取错误信息
    Alidayu::getErrorInfo();
```