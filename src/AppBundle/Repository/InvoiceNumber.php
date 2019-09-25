<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

class InvoiceNumber extends EntityRepository
{
    public function getLastInvoiceNumber()
    {
        try {
            $lastInvoiceNumber = $this->getEntityManager()->createQueryBuilder()
                ->select('i')
                ->from('AppBundle:Invoice', 'i')
                ->orderBy('i.invoiceNumber', 'DESC')
                ->setMaxResults(1)
                ->getQuery()
                ->getOneOrNullResult()
           ;
            if (!$lastInvoiceNumber) {
                throw $this->createNotFoundException(
                );
                // echo '<div class="flash-error">Geen factuurnummer gevonden</div>';
            }

            return $lastInvoiceNumber->getInvoiceNumber() + 1;
        } catch (\Exception $e) {
            echo '<div class="flash-error">' . $e . '</div>';
        }
    }
}
