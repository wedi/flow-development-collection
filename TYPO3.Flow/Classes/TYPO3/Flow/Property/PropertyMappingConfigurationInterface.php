<?php
namespace TYPO3\Flow\Property;

/*                                                                        *
 * This script belongs to the TYPO3 Flow framework.                       *
 *                                                                        *
 * It is free software; you can redistribute it and/or modify it under    *
 * the terms of the GNU Lesser General Public License, either version 3   *
 * of the License, or (at your option) any later version.                 *
 *                                                                        *
 * The TYPO3 project - inspiring people to share!                         *
 *                                                                        */

/**
 * Configuration object for the property mapper. This interface specifies all methods
 * which are used by the property mapper and by the type converters during the conversion
 * process. Thus, this interface does only contain read-only methods, and no methods
 * to set any of these options.
 *
 * As developer, you should probably subclass the PropertyMappingConfiguration class if
 * adjustments are needed there.
 *
 * @api
 */
interface PropertyMappingConfigurationInterface {

	/**
	 * @param string $propertyName
	 * @return boolean TRUE if the given propertyName should be mapped, FALSE otherwise.
	 * @api
	 */
	public function shouldMap($propertyName);

	/**
	 * Check if the given $propertyName should be skipped during mapping.
	 *
	 * @param string $propertyName
	 * @return boolean
	 * @api
	 */
	public function shouldSkip($propertyName);

	/**
	 * Whether unknown (unconfigured) properties should be skipped during
	 * mapping, instead if causing an error.
	 *
	 * @return boolean
	 * @api
	 */
	public function shouldSkipUnknownProperties();

	/**
	 * Returns the sub-configuration for the passed $propertyName. Must ALWAYS return a valid configuration object!
	 *
	 * @param string $propertyName
	 * @return \TYPO3\Flow\Property\PropertyMappingConfigurationInterface the property mapping configuration for the given $propertyName.
	 * @api
	 */
	public function getConfigurationFor($propertyName);

	/**
	 * Maps the given $sourcePropertyName to a target property name.
	 * Can be used to rename properties from source to target.
	 *
	 * @param string $sourcePropertyName
	 * @return string property name of target
	 * @api
	 */
	public function getTargetPropertyName($sourcePropertyName);

	/**
	 * @param string $typeConverterClassName
	 * @param string $key
	 * @return mixed configuration value for the specific $typeConverterClassName. Can be used by Type Converters to fetch converter-specific configuration
	 * @api
	 */
	public function getConfigurationValue($typeConverterClassName, $key);

	/**
	 * This method can be used to explicitely force a TypeConverter to be used for this Configuration.
	 *
	 * @return \TYPO3\Flow\Property\TypeConverterInterface The type converter to be used for this particular PropertyMappingConfiguration, or NULL if the system-wide configured type converter should be used.
	 * @api
	 */
	public function getTypeConverter();
}
