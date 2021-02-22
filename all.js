const { exec } = require("child_process");
var fs = require("fs");
name = process.argv[2];

/**
 * create model
 * create resource controller
 * create resource route
 * create resource collerction
 * create request
 */
//php artisan make:controller PhotoController --resource
//Route::apiResource('/messages', 'MessageController');
exec(`php artisan make:model model/${name} -a`, (error, stdout, stderr) => {
    console.log(error)
    exec(
        `php artisan make:controller ${name}Controller --resource`,
        (error, stdout, stderr) => {
            exec(
                `php artisan make:resource ${name}Resource `,
                (error, stdout, stderr) => {
                    exec(
                        `php artisan make:request ${name}Request `,
                        (error, stdout, stderr) => {
                            //start edit model
                            fs.readFile(
                                `app/model/${name}.php`,
                                "utf-8",
                                (err, data) => {
                                    fs.writeFile(
                                        `app/model/${name}.php`,
                                        data.split("//").join(`
protected $fillable = [
'id'
];
                    `),
                                        err => {
                                            //start edit api.php
                                            fs.appendFile(
                                                `routes/web.php`,
                                               `
Route::resource('/${name}s', '${name}Controller');                                               
                                               `,
                                                err => {
                                                    fs.readFile("dev/controller.txt", "utf-8", (err, data) => {
                                                        fs.writeFile(`app/http/Controllers/${name}controller.php`, data.split("$model").join(name), (err) => {
                                                            fs.readFile("dev/resource.txt", "utf-8", (err, data) => {
                                                                fs.writeFile(`app/http/Resources/${name}resource.php`, data.split("$model").join(name), (err) => {
                                                                    fs.readFile("dev/request.txt", "utf-8", (err, data) => {
                                                                        fs.writeFile(`app/http/Requests/${name}Request.php`, data.split("$model").join(name), (err) => {
                                                                            
                                                                          });
                                                                      });
                                                                  });
                                                              });
                                                          });
                                                      });
                                                }
                                            );
                                            //end edit api.php
                                        }
                                    );
                                }
                            );
                            //end edit model
                        }
                    );
                }
            );
        }
    );
});
