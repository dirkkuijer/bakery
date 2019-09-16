<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

class InvoiceNumber extends EntityRepository
{
    public function getLastInvoiceNumber()
    {
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
                'Geen factuurnummer gevonden'
            );
        }

        return $lastInvoiceNumber->getInvoiceNumber() + 1;
    }
}
