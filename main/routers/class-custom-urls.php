<?php

namespace Ata;

class Custom_Urls_Router extends Router
{
  public function main()
  {
    // Custom URLS
    $this->add_template_include();
    $this->add_rewrite_rules();
    $this->add_query_vars();
  }

  protected function add_template_include()
  {
    add_action('template_include', function ($template) {

      foreach ($this->routes as &$this->route) :

        if (isset($this->route->permission))
          if ($this->check_permissions()) continue;

        if (get_query_var($this->route->route) != false || get_query_var($this->route->route) != '') {

          $this->set_controller_name();

          $this->create_controller();

          $this->call_method();

          return get_template_directory() . '/' . $this->controller->view . '.php';
        }
      endforeach;

      return $template;
    });
  }


  protected function add_rewrite_rules()
  {

    add_action('init',  function () {

      foreach ($this->routes as &$this->route) :

        if (isset($this->route->permission))
          if ($this->check_permissions()) continue;

        add_rewrite_rule($this->create_rule(), 'index.php?' . $this->route->route . '=$matches[1]', 'top');

      endforeach;
    });
  }

  protected function add_query_vars()
  {

    add_filter('query_vars', function ($query_vars) {

      foreach ($this->routes as &$this->route) :

        if (isset($this->route->permission))
          if ($this->check_permissions()) continue;

        $query_vars[] =  $this->route;

      endforeach;

      return $query_vars;
    });
  }


  protected function create_controller()
  {
    // Catch exception inside construct method of class
    try {
      $this->controller = new $this->controller();
    } catch (\Exception $e) {

      $this->handle_exception($e);
    }
  }
  protected function call_method()
  {

    // Catch exception inside method of class
    try {

      $parameters = explode("/", get_query_var($this->route->route));

      unset($parameters[0]);

      call_user_func_array([$this->controller, $this->route->method], $parameters);
    } catch (\Exception $e) {

      $this->controller->handle_exception($e);
    }
  }

  protected function handle_exception($e)
  {

    global $ata;

    $ata =  (object)[];

    $ata->message = $e->getMessage();

    return get_template_directory() . '/templates/exception.php';
  }
}
