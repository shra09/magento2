<?php
/**
 * @copyright Copyright (c) 2014 X.commerce, Inc. (http://www.magentocommerce.com)
 */
namespace Magento\Framework\Search;

use Magento\Framework\Search\Request\BucketInterface;
use Magento\Framework\Search\Request\Dimension;
use Magento\Framework\Search\Request\QueryInterface;

/**
 * Search Request
 *
 * @codeCoverageIgnore
 */
class Request implements RequestInterface
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $index;

    /**
     * @var BucketInterface[]
     */
    protected $buckets;

    /**
     * Main query which represents the whole query hierarchy
     *
     * @var QueryInterface
     */
    protected $query;

    /**
     * @var int|null
     */
    protected $from;

    /**
     * @var int|null
     */
    protected $size;

    /**
     * @var Dimension[]
     */
    protected $dimensions;

    /**
     * @param string $name
     * @param string $indexName
     * @param QueryInterface $query
     * @param int|null $from
     * @param int|null $size
     * @param Dimension[] $dimensions
     * @param BucketInterface[] $buckets
     */
    public function __construct(
        $name,
        $indexName,
        QueryInterface $query,
        $from = null,
        $size = null,
        array $dimensions = [],
        array $buckets = []
    ) {
        $this->name = $name;
        $this->index = $indexName;
        $this->query = $query;
        $this->from = $from;
        $this->size = $size;
        $this->buckets = $buckets;
        $this->dimensions = $dimensions;
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * {@inheritdoc}
     */
    public function getIndex()
    {
        return $this->index;
    }

    /**
     * {@inheritdoc}
     */
    public function getDimensions()
    {
        return $this->dimensions;
    }

    /**
     * {@inheritdoc}
     */
    public function getAggregation()
    {
        return $this->buckets;
    }

    /**
     * {@inheritdoc}
     */
    public function getQuery()
    {
        return $this->query;
    }

    /**
     * {@inheritdoc}
     */
    public function getFrom()
    {
        return $this->from;
    }

    /**
     * {@inheritdoc}
     */
    public function getSize()
    {
        return $this->size;
    }
}
