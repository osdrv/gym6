<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $customer->getId() ?></td>
    </tr>
    <tr>
      <th>Login:</th>
      <td><?php echo $customer->getLogin() ?></td>
    </tr>
    <tr>
      <th>Mail:</th>
      <td><?php echo $customer->getMail() ?></td>
    </tr>
    <tr>
      <th>Name:</th>
      <td><?php echo $customer->getName() ?></td>
    </tr>
    <tr>
      <th>Password:</th>
      <td><?php echo $customer->getPassword() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('customer/edit?id='.$customer->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('customer/index') ?>">List</a>
