<?hh // strict

final class :div:index extends :x:element {
  attribute :div;

  use XHPHelpers;

  protected function render(): XHPRoot {
    $id = $this->getID();
    return (
    <div id={$id}>
      <h1>Nazg</h1>
      Begin developing HHVM/Hack Http Application / {phpversion()}
    </div>
    );
  }
}
