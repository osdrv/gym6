<h1>Customers List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Login</th>
      <th>Mail</th>
      <th>Name</th>
      <th>Password</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($customers as $customer): ?>
    <tr>
      <td><a href="<?php echo url_for('customer/show?id='.$customer->getId()) ?>"><?php echo $customer->getId() ?></a></td>
      <td><?php echo $customer->getLogin() ?></td>
      <td><?php echo $customer->getMail() ?></td>
      <td><?php echo $customer->getName() ?></td>
      <td><?php echo $customer->getPassword() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('customer/new') ?>">New</a>
